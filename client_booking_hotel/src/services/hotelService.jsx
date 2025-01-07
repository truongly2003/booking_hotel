import httpRequest from '@utils/httpRequest'
export const getAllHotel=async()=>{
    try {
        const response =await httpRequest.get("/hotels")
        return response.data;
    } catch (error) {
        console.error(error)
    }
}