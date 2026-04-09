from fastapi import APIRouter, Depends, HTTPException
from sqlalchemy.orm import Session
from api.data.db import get_db
from api.data.models import Pedido as PedidoDB
from api.models.schemas import PedidoCreate, PedidoPatch
from api.security.auth import verificar_Peticion

router = APIRouter(prefix="/v1/pedidos", tags=["CRUD Pedidos"])

@router.get("/")
def get_pedidos(db: Session = Depends(get_db)):
    pedidos = db.query(PedidoDB).all()
    return {"status": "200", "total": len(pedidos), "data": pedidos}

@router.get("/{id}")
def get_pedido(id: int, db: Session = Depends(get_db)):
    pedido = db.query(PedidoDB).filter(PedidoDB.id == id).first()
    if not pedido:
        raise HTTPException(status_code=404, detail="Pedido no encontrado")
    return {"status": "200", "data": pedido}

@router.post("/")
def create_pedido(pedido: PedidoCreate, db: Session = Depends(get_db)):
    nuevo_pedido = PedidoDB(**pedido.dict())
    db.add(nuevo_pedido)
    db.commit()
    db.refresh(nuevo_pedido)
    return {"status": "200", "mensaje": "Pedido creado exitosamente", "datos": nuevo_pedido}

@router.patch("/{id}")
def patch_pedido(id: int, pedido: PedidoPatch, db: Session = Depends(get_db)):
    db_ped = db.query(PedidoDB).filter(PedidoDB.id == id).first()
    if not db_ped:
        raise HTTPException(status_code=404, detail="Pedido no encontrado")
    update_data = pedido.dict(exclude_unset=True)
    for key, val in update_data.items():
        setattr(db_ped, key, val)
    db.commit()
    db.refresh(db_ped)
    return {"status": "200", "mensaje": "Pedido actualizado correctamente", "datos": db_ped}

@router.delete("/{id}")
def delete_pedido(id: int, db: Session = Depends(get_db), auth_user = Depends(verificar_Peticion)):
    if auth_user.rol != 'admin':
        raise HTTPException(status_code=403, detail="Permisos insuficientes")
    db_ped = db.query(PedidoDB).filter(PedidoDB.id == id).first()
    if not db_ped:
        raise HTTPException(status_code=404, detail="Pedido no encontrado")
    db.delete(db_ped)
    db.commit()
    return {"status": "200", "mensaje": "Pedido eliminado exitosamente"}
