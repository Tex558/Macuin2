from fastapi import APIRouter, Depends, HTTPException
from sqlalchemy.orm import Session
from typing import List
from api.data.db import get_db
from api.data.models import Usuario as UsuarioDB
from api.models.schemas import UsuarioCreate, UsuarioPatch, UsuarioResponse
from api.security.auth import verificar_Peticion

router = APIRouter(prefix="/v1/usuarios", tags=["CRUD Usuarios"])

@router.get("/")
def get_usuarios(db: Session = Depends(get_db)):
    usuarios = db.query(UsuarioDB).all()
    return {"status": "200", "total": len(usuarios), "data": usuarios}

@router.get("/{id}")
def get_usuario(id: int, db: Session = Depends(get_db)):
    usuario = db.query(UsuarioDB).filter(UsuarioDB.id == id).first()
    if not usuario:
        raise HTTPException(status_code=404, detail="Usuario no encontrado")
    return {"status": "200", "data": usuario}

@router.post("/")
def create_usuario(usuario: UsuarioCreate, db: Session = Depends(get_db)):
    if db.query(UsuarioDB).filter(UsuarioDB.email == usuario.email).first():
        raise HTTPException(status_code=400, detail="Email ya registrado")
    nuevo_usuario = UsuarioDB(**usuario.dict())
    db.add(nuevo_usuario)
    db.commit()
    db.refresh(nuevo_usuario)
    return {"status": "200", "mensaje": "Usuario agregado exitosamente", "datos": nuevo_usuario}

@router.put("/{id}")
def update_usuario(id: int, usuario: UsuarioCreate, db: Session = Depends(get_db)):
    db_usr = db.query(UsuarioDB).filter(UsuarioDB.id == id).first()
    if not db_usr:
        raise HTTPException(status_code=404, detail="Usuario no encontrado")
    for key, val in usuario.dict().items():
        setattr(db_usr, key, val)
    db.commit()
    db.refresh(db_usr)
    return {"status": "200", "mensaje": "Usuario actualizado correctamente", "datos": db_usr}

@router.patch("/{id}")
def patch_usuario(id: int, usuario: UsuarioPatch, db: Session = Depends(get_db)):
    db_usr = db.query(UsuarioDB).filter(UsuarioDB.id == id).first()
    if not db_usr:
        raise HTTPException(status_code=404, detail="Usuario no encontrado")
    update_data = usuario.dict(exclude_unset=True)
    for key, val in update_data.items():
        setattr(db_usr, key, val)
    db.commit()
    db.refresh(db_usr)
    return {"status": "200", "mensaje": "Usuario editado correctamente", "datos": db_usr}

@router.delete("/{id}")
def delete_usuario(id: int, db: Session = Depends(get_db), auth_user: UsuarioDB = Depends(verificar_Peticion)):
    if auth_user.rol != 'admin':
        raise HTTPException(status_code=403, detail="No tienes permisos para esto")
    db_usr = db.query(UsuarioDB).filter(UsuarioDB.id == id).first()
    if not db_usr:
        raise HTTPException(status_code=404, detail="Usuario no encontrado")
    db.delete(db_usr)
    db.commit()
    return {"status": "200", "mensaje": "Usuario eliminado exitosamente"}
