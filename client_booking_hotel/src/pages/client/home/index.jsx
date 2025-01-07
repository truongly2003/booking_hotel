import image from '../../../assets/room_1.jpg';
import styles from './home.module.css';
import FormSearch from '@pages/client/home/FormSearch';
function Home() {
    return (
        <div
            className={styles.heroSection}
            style={{
                backgroundImage: `url(${image})`,
            }}
        >
            <div className={styles.content}>
                {/* <div className="text-center position-absolute top-50 start-50 translate-middle">
                    <p className="fs-5"> & Best Resort</p>
                    <h1 className="fw-bold display-4">A Symphony of Comfort & Convenience</h1>
                    <button className="btn btn-warning btn-lg mt-3 fw-bold">Room & Suites</button>
                </div> */}
                {/* Form đặt chỗ */}
                <FormSearch />
            </div>
        </div>
    );
}

export default Home;
