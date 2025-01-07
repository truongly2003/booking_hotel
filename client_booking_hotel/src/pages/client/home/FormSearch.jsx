function FormSearch() {
    return ( 
        <div
        className="position-absolute start-50 translate-middle-x bg-white p-4 rounded shadow"
        style={{
            bottom: '20px',
            width: '90%',
            maxWidth: '1100px',
        }}
    >
        <form>
            <div className="row g-3">
            <div className="col-md-4">
                    <label htmlFor="adults" className="form-label text-dark">
                        Bạn muốn đi đâu
                    </label>
                    <select id="adults" className="form-select">
                        <option>Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                {/* Check-in */}

                <div className="col-md-3">
                    <label htmlFor="checkin" className="form-label text-dark">
                        Check in
                    </label>
                    <input type="date" className="form-control" id="checkin" placeholder="Arrival Date" />
                </div>
                {/* Check-out */}
                <div className="col-md-3">
                    <label htmlFor="checkout" className="form-label text-dark">
                        Check Out
                    </label>
                    <input type="date" className="form-control" id="checkout" placeholder="Leave Date" />
                </div>
             
                {/* Button */}
                <div className="col-md-2 d-flex align-items-end">
                    <button type="submit" className="btn btn-warning w-100">
                        Check Now
                    </button>
                </div>
            </div>
        </form>
    </div>
     );
}

export default FormSearch;