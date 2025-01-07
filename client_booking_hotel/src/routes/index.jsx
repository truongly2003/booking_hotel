import routes from '@configs/routes';
// layout
import DefaultLayout from '@layouts/DefaultLayout';
import ProfileLayout from '@layouts/ProfileLayout';
// client
import Home from '@client/home';
import Hotel from '@client/hotel';
import HotelDetail from '@client/hotelDetail';
// import Confirm from '@client/order/Confirm'
import Payment from '@client/order/Payment';
import Confirm from '../pages/client/order/confirm';
// authentication
import Login from '@client/Authentication/Login';
import SignUp from '@client/Authentication/SignUp';
// profile
import Account from '@client/Profile/Account';
import Booking from '@client/Profile/Booking';


const publicRoutes = [
    // client
    { path: routes.Home, component: Home, layout: DefaultLayout },
  
    { path: routes.Hotel, component: Hotel, layout: DefaultLayout },
    { path: routes.HotelDetail, component: HotelDetail, layout: DefaultLayout },
    // profile
    { path: routes.Account, component: Account, layout: ProfileLayout },
    { path: routes.Booking, component: Booking, layout: ProfileLayout },

    //order
    { path: routes.Confirm, component: Confirm, layout: DefaultLayout },
    { path: routes.Payment, component: Payment, layout: DefaultLayout },

    // authentication
    { path: routes.Login, component: Login, layout: null },
    { path: routes.SignUp, component: SignUp, layout: null },
];

export default publicRoutes;
