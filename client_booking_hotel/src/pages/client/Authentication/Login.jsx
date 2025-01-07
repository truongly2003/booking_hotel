import { Google, Facebook, Twitter, LinkedIn, Email } from '@mui/icons-material';
import { Link } from 'react-router-dom';
import GppMaybeIcon from '@mui/icons-material/GppMaybe';
function Login() {
    return (
        <div className="container-fluid vh-100 d-flex justify-content-center align-items-center">
            <div className="row justify-content-center" style={{ width: '1000px' }}>
                <div className="col-lg-6 col-md-8 col-sm-10">
                    <div className="card p-4 shadow-sm">
                        <div className="card-body">
                            <div className="text-center mb-4">{/* hello */}</div>

                            {/* form start */}
                            <form className="login-form " method="post">
                                <div className="mb-3">
                                    <div className="input-group border rounded">
                                        <span className="input-group-text bg-light border-0">
                                            <Email />
                                        </span>
                                        <input
                                            type="email"
                                            className="form-control form-focus p-3 border-0"
                                            placeholder="Email"
                                            name="email"
                                            required
                                        />
                                    </div>
                                </div>
                                {/* keyhole */}
                                <div className="mb-3 ">
                                    <div className="input-group border rounded">
                                        <span className="input-group-text bg-light border-0">
                                            <GppMaybeIcon />
                                        </span>
                                        <input
                                            type="password"
                                            className="form-control p-3  border-0"
                                            placeholder="Mật khẩu"
                                            name="password"
                                            required
                                        />
                                    </div>
                                </div>
                                <div className="form-check mb-3 d-flex justify-content-between">
                                    <div>
                                        <input type="checkbox" className="form-check-input " id="rememberMe" />
                                        <label className="form-check-label fs-6" htmlFor="rememberMe">
                                            Nhớ mật khẩu
                                        </label>
                                    </div>
                                    <Link to="/forgot-password" className="forgot-btn fs-6 text-decoration-none">
                                        Quên mật khẩu?
                                    </Link>
                                </div>

                                <div className="d-grid mb-3 d-flex justify-content-center mt-4">
                                    <button type="submit" className="btn btn-primary w-50 fs-6 p-2">
                                        Đăng nhập
                                    </button>
                                </div>
                                <div className="text-center mt-4 d-flex align-items-center justify-content-center">
                                    <hr className="border-primary flex-grow-1" />
                                    <p className="fs-6 mx-3 mb-0">Hoặc đăng nhập với</p>
                                    <hr className="border-primary flex-grow-1" />
                                </div>

                                <div className="d-flex justify-content-center mb-3 mt-4">
                                    <button type="button" className="btn btn-outline-danger mx-2">
                                        <Google />
                                    </button>
                                    <button type="button" className="btn btn-outline-primary mx-2">
                                        <Facebook />
                                    </button>
                                    <button type="button" className="btn btn-outline-info mx-2">
                                        <Twitter />
                                    </button>
                                    <button type="button" className="btn btn-outline-secondary mx-2">
                                        <LinkedIn />
                                    </button>
                                </div>
                                <div className="text-center">
                                    <span className="fs-6">
                                        Bạn chưa có tài khoản?{' '}
                                        <Link to="/signup" className="signup-btn fs-6">
                                            Đăng ký ngay
                                        </Link>
                                    </span>
                                </div>
                            </form>
                            {/* form end */}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Login;
