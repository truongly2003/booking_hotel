import image from '@assets/room_1.jpg';
import { getAllHotel } from '@services/hotelService';
import { useEffect, useState } from 'react';
import StarBorderPurple500Icon from '@mui/icons-material/StarBorderPurple500';
import styles from './Hotel.module.css';
import { Link } from 'react-router-dom';

function HotelItem() {
    const [hotels, setHotels] = useState([]);
    console.log(hotels);
    useEffect(() => {
        const fetchHotels = async () => {
            try {
                const data = await getAllHotel();
                setHotels(data);
            } catch (error) {
                console.log(error);
            }
        };
        fetchHotels();
    }, []);

    return (
        <div className="mb-4">
            <div className="row g-4">
                {hotels.map((hotel, index) => (
                    <div className="col-12 col-md-6" key={index}>
                        <div className="card d-flex flex-column flex-md-row rounded border p-3">
                            <div className="col-12 col-md-5 d-flex align-items-center mb-3 mb-md-0">
                                <img
                                    src={image}
                                    className="img-fluid rounded w-100 object-fit-cover "
                                    alt={hotel.hotel_name}
                                    style={{height:'200px'}}
                                />
                            </div>
                            <div className="col-12 col-md-7">
                                <div className="card-body p-0 ms-md-3">
                                    <h5 className="card-title text-truncate" style={{ maxHeight: '3rem' }}>
                                        {hotel.hotel_name}
                                    </h5>
                                    <div className="d-flex align-items-center">
                                        <StarBorderPurple500Icon className="me-2 text-warning" />{' '}
                                        <span>Đánh giá 0/5</span>
                                    </div>
                                    <p>+84 0782 713 663</p>
                              
                                    <p className={`card-text text-muted ${styles.hotel_text}`} >{hotel.address}</p>
                                    <Link to={`/hotel/${hotel.hotel_id}/rooms`} className={`btn ${styles.color_btn}`} >Đặt Phòng</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
}

export default HotelItem;
