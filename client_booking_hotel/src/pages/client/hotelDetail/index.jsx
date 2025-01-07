import KingBedIcon from '@mui/icons-material/KingBed';
import PersonIcon from '@mui/icons-material/Person';
import CropIcon from '@mui/icons-material/Crop';
import { Link, useParams } from 'react-router-dom';
import { getAllRoomByHotelId } from '@services/roomService';
// import { getAllRoomType } from '@services/roomTypeService';
import { useEffect, useState } from 'react';
import HotelCarousel from './HotelCarousel';
import { formatCurrency } from '@utils/formatCurrency';
// import PaginationComponent from '@components/PaginationComponent';
function HotelDetail() {
    const { id } = useParams();
    const [rooms, setRooms] = useState([]);
    const [listRoomsSelected, setRoomsSelected] = useState([]);
    const [totalPrice, setTotalPrice] = useState(0);
    const handleListRoomsSelected = (room, selectedCount) => {
        const roomExists = listRoomsSelected.find((r) => r.room_type_id === room.room_type_id);
        if (roomExists) {
            setRoomsSelected((prev) =>
                prev.map(r=>r.room_type_id === room.room_type_id ? {...r,selectedCount} : r)
            );
            setTotalPrice(
                (prev) => prev - (room.base_price * roomExists.selectedCount) + ( room.base_price * selectedCount),
            );
        } else {
            setRoomsSelected((prev) => [...prev, { room_type_id: room.room_type_id, selectedCount }]);
            setTotalPrice((prev) => prev + room.base_price * selectedCount);
        }
    };

    useEffect(() => {
        const fetchRooms = async () => {
            try {
                const data = await getAllRoomByHotelId(id,'2024-12-7','2024-12-10');
                setRooms(data);
            } catch (error) {
                console.error(error);
            }
        };
        fetchRooms();
    }, [id]);
    
    // console.log(typeof rooms)
    return (
        <div className="container mt-4">
            {/* start hotel */}
            <div className="row  py-3" style={{ borderBottom: '1px solid #ddd' }}>
                <div className="col-md-4">
                    <div className="row">
                        <h2 className="fw-bold">Khách sạn LOTTE BUSAN</h2>
                        <p className="mb-0">
                            <span className="fw-bold">5 sao</span> | 772, Gaya-daero, Busanjin-gu, Busan, Korea |
                            +82-51-810-1000
                        </p>
                    </div>
                    <div className="row mt-4">
                        <iframe
                            src="https://www.google.com/maps/place/Th%C3%A0nh+ph%E1%BB%91+H%E1%BB%93+Ch%C3%AD+Minh,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.7540961,106.0356877,9z/data=!3m1!4b1!4m6!3m5!1s0x317529292e8d3dd1:0xf15f5aad773c112b!8m2!3d10.8230989!4d106.6296638!16zL20vMGhuNGg?entry=ttu&g_ep=EgoyMDI0MTIwMS4xIKXMDSoASAFQAw%3D%3D"
                            width="300"
                            height="200"
                            style={{ border: 0, borderRadius: '8px' }}
                            allowFullScreen=""
                            loading="lazy"
                        ></iframe>
                    </div>
                </div>
                <div className="col-md-8 text-md-end text-start mt-3 mt-md-0">
                    <HotelCarousel />
                </div>
            </div>
            {/* end hotel */}

            {/*start search room */}
            <div className="row mt-4">
                <div className="d-flex border justify-content-between w-100 p-4 gap-4">
                    <div className="col-md-4">
                        <label htmlFor="check-in-date">Ngày nhận phòng:</label>
                        <input type="date" id="check-in-date" className="form-control" />
                    </div>
                    <div className="col-md-4">
                        <label htmlFor="check-out-date">Ngày trả phòng:</label>
                        <input type="date" id="check-out-date" className="form-control" />
                    </div>
                    <div className="col-md-4 d-flex align-items-end">
                        <button className="btn btn-primary ">Tìm kiếm</button>
                    </div>
                </div>
            </div>
            {/*end search room */}

            {/* start room */}
            <div className="row mt-4">
                <h4 className="d-flex justify-content-center">Danh sách phòng trống</h4>
            </div>
            <div className="row">
                <div className="d-flex border p-4">
                    <div className="col-md-4 ">
                        {/* <label>Chọn loại phòng</label>
                        <select className="p-2 ms-2 w-50">
                            <option value="">--Chọn loại phòng--</option>
                            {typeRooms.map((typeRoom, index) => (
                                <option key={index} value={typeRoom.room_type_id}>
                                    {typeRoom.room_type_name}
                                </option>
                            ))}
                        </select> */}
                    </div>

                    <div className="col-md-3">
                        <label>Xắp xếp theo giá</label>
                        <select className="p-2 ms-2 w-50">
                            <option>Mặc đinh</option>
                            <option>Tăng dần</option>
                            <option>Giảm dần</option>
                        </select>
                    </div>
                </div>
            </div>
            <div className="row mt-4">
                <div className="d-flex justify-content-between align-items-center">
                    <div className="" role="group" aria-label="Room Filter">
                        <button type="button" className="btn btn-outline-success active me-2">
                            All rooms
                        </button>
                        <button type="button" className="btn btn-outline-success me-2">
                            1 bed
                        </button>
                        <button type="button" className="btn btn-outline-success me-2">
                            2 beds
                        </button>
                        <button type="button" className="btn btn-outline-success me-2">
                            3+ beds
                        </button>
                    </div>
                    {/* Room Count */}
                    <div>
                        <span>Showing 10 of 10 rooms</span>
                    </div>
                </div>
            </div>
            {/* start category rooms */}
            <div className="row mt-4">
                <div className="col-md-9 ">
                    {rooms.length > 0 ?(  rooms.map((room, index) => (
                        <div key={index} className="mb-4 p-2 border rounded">
                            <div className="row">
                                <div className="col-md-4">
                                    <div className="" style={{ height: '250px' }}>
                                        <div key={0} className="h-100">
                                            <img
                                                src={`/rooms/${room.images[0]}`} // Chỉ lấy ảnh đầu tiên
                                                className="img-fluid rounded h-100"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div className="col-md-8">
                                    <h5>{room.room_type_name}</h5>
                                    <div>
                                        <table className="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Phòng</th>
                                                    <th>Số người</th>
                                                    <th>Số giường </th>
                                                    <th>còn lại </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {room.room_size}/m2 <CropIcon />
                                                    </td>
                                                    <td>
                                                        {room.max_capacity} <PersonIcon />
                                                    </td>
                                                    <td>
                                                        {room.bed_count} <KingBedIcon />
                                                    </td>
                                                    <td>{room.stock}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <p>{room.amenities}</p>
                                    <p>
                                        <strong>Giá:{formatCurrency(room.base_price)} VNĐ</strong>
                                    </p>

                                    <div className="d-flex align-items-center">
                                        <select
                                            className="p-2 w-20"
                                            onChange={(e) => handleListRoomsSelected(room, parseInt(e.target.value))}
                                        >
                                            <option value={0}>0</option>
                                            {Array.from({ length: room.stock }, (_, i) => (
                                                <option key={i} value={i + 1}>
                                                    {i + 1}
                                                </option>
                                            ))}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))
                    ):(<div>No results found</div>)
                }
                    <div className="mb-4">
                        {/* <PaginationComponent /> */}
                    </div>
                </div>
                <div className="col-md-3 sticky-top vh-100 p-4 bg-light shadow-sm rounded">
                    <h4 className="mb-4 text-primary text-center">Thông tin đặt phòng</h4>
                    <hr className="border-primary" />
                    <div className='mb-4'>
                        <p className='mb-2'>Số phòng đã chọn: {listRoomsSelected.reduce((ac,cur)=> ac+cur.selectedCount ,0)}</p>
                        <p className='mb-4'>Tổng giá: {formatCurrency(totalPrice)} VNĐ</p>
                        <Link to="/confirm" className="btn btn-primary">Đặt phòng</Link>
                    </div>
                </div>
            </div>
            {/* end category rooms */}
        </div>
    );
}

export default HotelDetail;
