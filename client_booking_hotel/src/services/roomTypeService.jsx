import httpRequest from '@utils/httpRequest'
export const getAllRoomType =async()=>{
    try{
        const response=await httpRequest.get('/roomtype');
        return response.data;
    }catch(err){
        console.error(err);
    }
}
