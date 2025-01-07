import CategoryTitle from '@components/CategoryTitle';
import PaginationComponent from '@components/PaginationComponent';
import HotelItem from './HotelItem';
// import { useState } from 'react';
// https://restcountries.com/v3.1/all
function Hotel() {
    const handleSearchSubmit = () => {};

    return (
        <div className="container mb-4">
            <div className="row mt-3">
                <CategoryTitle title="Khách sạn" />
            </div>

            {/* Tìm kiếm */}
            <div className="row mb-3">
                <div className="col-md-12">
                    <form onSubmit={handleSearchSubmit} className="d-flex flex-wrap">
                        <div className="mb-2 me-2">
                            <input type="text" name="country" className="form-control" placeholder="Quốc gia" />
                        </div>
                        <div className="mb-2 me-2">
                            <input type="text" name="city" className="form-control" placeholder="Tỉnh/Thành" />
                        </div>
                        <div className="mb-2 me-2">
                            <input type="text" name="district" className="form-control" placeholder="Quận/Huyện" />
                        </div>
                        <button type="submit" className="btn btn-primary mb-2">
                            Tìm kiếm
                        </button>
                    </form>
                </div>
            </div>

            <div className="row">
                <div className="col-md-12">
                    <HotelItem />
                    <PaginationComponent />
                </div>
            </div>
        </div>
    );
}

export default Hotel;
