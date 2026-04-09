from fastapi import HTTPException, Depends, Header
from sqlalchemy.orm import Session
from api.data.db import get_db
from api.data.models import Usuario

def verificar_Peticion(x_user_email: str = Header(None), db: Session = Depends(get_db)):
    if not x_user_email:
        raise HTTPException(status_code=401, detail="Usuario no autenticado (Falta Header X-User-Email)")
    usuario = db.query(Usuario).filter(Usuario.email == x_user_email).first()
    if not usuario:
        raise HTTPException(status_code=401, detail="Usuario no válido")
    return usuario
