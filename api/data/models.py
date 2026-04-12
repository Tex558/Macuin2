from sqlalchemy import Column, Integer, String, Float, ForeignKey, DateTime
from sqlalchemy.orm import relationship
from datetime import datetime
from api.data.db import Base

class Usuario(Base):
    __tablename__ = "usuarios"

    id = Column(Integer, primary_key=True, index=True)
    nombre = Column(String, index=True)
    email = Column(String, unique=True, index=True)
    password = Column(String)
    telefono = Column(String, nullable=True)
    rol = Column(String, default="user") # 'admin', 'staff', 'user'

    pedidos = relationship("Pedido", back_populates="usuario")

class Producto(Base):
    __tablename__ = "productos"

    id = Column(Integer, primary_key=True, index=True)
    nombre = Column(String, index=True)
    precio = Column(Float)
    stock = Column(Integer)
    fabricante = Column(String)
    especificaciones = Column(String)

class Pedido(Base):
    __tablename__ = "pedidos"

    id = Column(Integer, primary_key=True, index=True)
    usuario_id = Column(Integer, ForeignKey("usuarios.id"))
    tarjeta = Column(String)
    telefono = Column(String)
    direccion = Column(String)
    estatus = Column(String, default="En curso") # En curso, entregado, cancelado
    prioridad = Column(String, default="Normal") # Normal, Alta, Urgente
    productos = Column(String, nullable=True) # JSON con los productos del pedido
    motivo_cancelacion = Column(String, nullable=True)
    creado_en = Column(DateTime, default=datetime.utcnow)

    usuario = relationship("Usuario", back_populates="pedidos")
