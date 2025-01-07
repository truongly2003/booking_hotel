import PropTypes from 'prop-types';
import Header from '@layouts/DefaultLayout/Header';
import CategoryTitle from '@components/CategoryTitle';
import SideBar from './SideBar';

function ProfileLayout({ children }) {
    return (
        <div>
            <Header />
            <div className="container">
                <div className="row mt-3">
                    <CategoryTitle title="Hồ sơ" />
                </div>
                <div className="row ">
                    {' '}
                    <div className="col-md-3">
                        <div className="border rounded">
                            <SideBar />
                        </div>
                    </div>
                    <div className="col-md-9">
                        <div className="border rounded p-2">{children}</div>
                        <div className="border rounded p-2 mt-2">{children}</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

ProfileLayout.propTypes = {
    children: PropTypes.node.isRequired,
};

export default ProfileLayout;
