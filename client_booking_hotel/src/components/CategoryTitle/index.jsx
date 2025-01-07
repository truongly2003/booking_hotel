import { Link } from 'react-router-dom';
import PropTypes from 'prop-types';
function CategoryTitle({ title }) {
    return (
        <div>
            <ul className="d-flex list-unstyled">
                <li className="me-2">
                    <Link to="/" className="text-decoration-none">
                        Trang Chủ
                    </Link>
                </li>
                <li className="me-2">/</li>
                <li>{title}</li>
            </ul>
        </div>
    );
}
CategoryTitle.propTypes = {
    title: PropTypes.string.isRequired,
};
export default CategoryTitle;
