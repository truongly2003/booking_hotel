import PropTypes from 'prop-types';
import Footer from './Footer';
import Header from './Header';
function DefaultLayout({ children }) {
    return (
        <div className='h-100'>
            <Header />
            {children}
            <Footer />
        </div>
    );
}
DefaultLayout.propTypes = {
    children: PropTypes.node.isRequired,
};
export default DefaultLayout;
