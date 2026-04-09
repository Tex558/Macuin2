from fastapi import FastAPI
from api.routers import usuarios, productos, pedidos, auth
from api.data.db import engine
from api.data.models import Base

#crear tablas
Base.metadata.create_all(bind=engine)

#Iniciaclización o instancia de la API
app = FastAPI(
    title='API Macuin2',
    description='Sistema central de Macuin2',
    version='1.0'
)

app.include_router(auth.router)
app.include_router(usuarios.router)
app.include_router(productos.router)
app.include_router(pedidos.router)

@app.get("/docs", include_in_schema=False)
def override_docs():
    from fastapi.openapi.docs import get_swagger_ui_html
    return get_swagger_ui_html(openapi_url="/openapi.json", title="Docs")
