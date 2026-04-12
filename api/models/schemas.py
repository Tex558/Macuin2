from pydantic import BaseModel
from typing import Optional, List
from datetime import datetime

# Usuario
class UsuarioBase(BaseModel):
    nombre: str
    email: str
    telefono: Optional[str] = None
    rol: Optional[str] = "user"

class UsuarioCreate(UsuarioBase):
    password: str

class UsuarioPatch(BaseModel):
    nombre: Optional[str] = None
    email: Optional[str] = None
    password: Optional[str] = None
    telefono: Optional[str] = None
    rol: Optional[str] = None

class UsuarioResponse(UsuarioBase):
    id: int

    class Config:
        orm_mode = True

# Producto
class ProductoBase(BaseModel):
    nombre: str
    precio: float
    stock: int
    fabricante: str
    especificaciones: str

class ProductoCreate(ProductoBase):
    pass

class ProductoPatch(BaseModel):
    nombre: Optional[str] = None
    precio: Optional[float] = None
    stock: Optional[int] = None
    fabricante: Optional[str] = None
    especificaciones: Optional[str] = None

class ProductoResponse(ProductoBase):
    id: int

    class Config:
        orm_mode = True

# Pedido
class PedidoBase(BaseModel):
    tarjeta: str
    telefono: str
    direccion: str

class PedidoCreate(PedidoBase):
    usuario_id: int 
    productos: Optional[str] = None

class PedidoPatch(BaseModel):
    estatus: Optional[str] = None
    prioridad: Optional[str] = None
    motivo_cancelacion: Optional[str] = None

class PedidoResponse(PedidoBase):
    id: int
    usuario_id: int
    estatus: str
    prioridad: Optional[str] = None
    productos: Optional[str] = None
    motivo_cancelacion: Optional[str] = None
    creado_en: datetime

    class Config:
        orm_mode = True

# Login
class LoginRequest(BaseModel):
    email: str
    password: str
