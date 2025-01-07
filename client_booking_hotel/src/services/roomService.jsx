import httpRequest from '@utils/httpRequest'
export const getAllRoomByHotelId = async (hotelId, checkInDate, checkOutDate) => {
    try {     
      const response = await httpRequest.get(`/hotel/${hotelId}/rooms`, {
        params: {
          check_in_date: checkInDate,
          check_out_date: checkOutDate,
        },
      });
  
      return response.data;  
    } catch (error) {
      console.error('Error fetching rooms:', error);
    }
  };