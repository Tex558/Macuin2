from fastapi import APIRouter

router = APIRouter(prefix="/misc", tags=["misc"])

@router.get("/ping")
def ping():
    return {"message": "pong"}
