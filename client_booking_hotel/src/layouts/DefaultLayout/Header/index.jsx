import { Link } from 'react-router-dom';
import PermIdentityIcon from '@mui/icons-material/PermIdentity';
const nav_items = [
    { name: 'Trang chủ', to: '/' },
    { name: 'Khách sạn', to: '/hotel' },
    { name: 'Blog', to: '/blog' },
    { name: 'Liên hệ', to: '/contact' },
];

function Header() {
    const currentUser = false;
    return (
        <header style={{ backgroundColor: '#2b2b2d' }}>
            <div className="d-flex container">
                <div className="ms-auto mt-3">
                    {currentUser ? (
                        <>
                            <div className='d-flex align-items-center'>
                                <PermIdentityIcon
                                    className="btn-danger text-white"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    style={{ cursor: 'pointer' }}
                                />
                                <span className='text-white ms-2'>ly truong</span>
                            </div>
                            <div className="dropdown-menu dropdown-menu-end" style={{ right: 0 }}>
                                {/* <ProfileItem width="200px" /> */}
                            </div>
                        </>
                    ) : (
                        <>
                             <Link to="/login" className="btn btn-secondary">Đăng nhập</Link>
                             <Link to="/signup" className="btn btn-secondary ms-2">Đăng ký</Link>
                        </>
                    )}
                </div>
            </div>

            <nav className="navbar navbar-expand-lg navbar-dark ">
                <div className="container d-flex justify-content-between mb-2">
                    <a className="navbar-brand" href="#">
                        Booking Hotel
                    </a>
                    <button
                        className="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarNav"
                        aria-controls="navbarNav"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarNav">
                        <ul className="navbar-nav ms-auto">
                            {nav_items.map((item, index) => (
                                <li key={index} className="nav-item ms-4">
                                    <Link className="nav-link" to={item.to}>
                                        {item.name}
                                    </Link>
                                </li>
                            ))}
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    );
}

export default Header;
