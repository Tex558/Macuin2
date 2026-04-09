from fastapi import APIRouter, Depends, HTTPException
from sqlalchemy.orm import Session
from api.data.db import get_db
from api.data.models import Producto as ProductoDB
from api.models.schemas import ProductoCreate, ProductoPatch
from api.security.auth import verificar_Peticion

router = APIRouter(prefix="/v1/productos", tags=["CRUD Productos"])

@router.get("/")
def get_productos(db: Session = Depends(get_db)):
    productos = db.query(ProductoDB).all()
    return {"status": "200", "total": len(productos), "data": productos}

@router.get("/{id}")
def get_producto(id: int, db: Session = Depends(get_db)):
    producto = db.query(ProductoDB).filter(ProductoDB.id == id).first()
    if not producto:
        raise HTTPException(status_code=404, detail="Producto no encontrado")
    return {"status": "200", "data": producto}

@router.post("/")
def create_producto(producto: ProductoCreate, db: Session = Depends(get_db)):
    nuevo_producto = ProductoDB(**producto.dict())
    db.add(nuevo_producto)
    db.commit()
    db.refresh(nuevo_producto)
    return {"status": "200", "mensaje": "Producto agregado exitosamente", "datos": nuevo_producto}

@router.put("/{id}")
def update_producto(id: int, producto: ProductoCreate, db: Session = Depends(get_db)):
    db_prod = db.query(ProductoDB).filter(ProductoDB.id == id).first()
    if not db_prod:
        raise HTTPException(status_code=404, detail="Producto no encontrado")
    for key, val in producto.dict().items():
        setattr(db_prod, key, val)
    db.commit()
    db.refresh(db_prod)
    return {"status": "200", "mensaje": "Producto actualizado correctamente", "datos": db_prod}

@router.patch("/{id}")
def patch_producto(id: int, producto: ProductoPatch, db: Session = Depends(get_db)):
    db_prod = db.query(ProductoDB).filter(ProductoDB.id == id).first()
    if not db_prod:
        raise HTTPException(status_code=404, detail="Producto no encontrado")
    update_data = producto.dict(exclude_unset=True)
    for key, val in update_data.items():
        setattr(db_prod, key, val)
    db.commit()
    db.refresh(db_prod)
    return {"status": "200", "mensaje": "Producto editado correctamente", "datos": db_prod}

@router.delete("/{id}")
def delete_producto(id: int, db: Session = Depends(get_db), auth_user = Depends(verificar_Peticion)):
    if auth_user.rol not in ['admin', 'staff']:
        raise HTTPException(status_code=403, detail="Permisos insuficientes")
    db_prod = db.query(ProductoDB).filter(ProductoDB.id == id).first()
    if not db_prod:
        raise HTTPException(status_code=404, detail="Producto no encontrado")
    db.delete(db_prod)
    db.commit()
    return {"status": "200", "mensaje": "Producto eliminado exitosamente"}
