from fastapi import APIRouter, Depends, HTTPException
from sqlalchemy.orm import Session
from api.data.db import get_db
from api.data.models import Usuario
from api.models.schemas import LoginRequest

router = APIRouter(prefix="/v1/auth", tags=["Auth"])

@router.post("/login")
def login(req: LoginRequest, db: Session = Depends(get_db)):
    usuario = db.query(Usuario).filter(Usuario.email == req.email, Usuario.password == req.password).first()
    if not usuario:
        raise HTTPException(status_code=401, detail="Credenciales inválidas")
    return {"status": "200", "mensaje": "Login exitoso", "rol": usuario.rol, "usuario_id": usuario.id, "email": usuario.email, "nombre": usuario.nombre}
