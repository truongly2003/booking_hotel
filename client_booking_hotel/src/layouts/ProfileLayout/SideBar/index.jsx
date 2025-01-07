import profile_items from '@constant/profileItems';
import { Fragment } from 'react';
import { Link } from 'react-router-dom';
function SideBar() {
    return (
        <div>
            <ul className="list-unstyled">
                {profile_items.map((item, index) => (
                    <Fragment key={index}>
                        {index === profile_items.length - 1 && (
                            <li>
                                <hr className="dropdown-divider" />
                            </li>
                        )}

                        <li className="fw-bold">
                            <div className="d-flex align-items-center p-2">
                                <span className="me-3">{item.icon}</span>
                                <Link className="dropdown-item fw-bold " to={item.to}>
                                    {item.title}
                                </Link>
                            </div>
                        </li>
                    </Fragment>
                ))}
            </ul>
        </div>
    );
}

export default SideBar;
