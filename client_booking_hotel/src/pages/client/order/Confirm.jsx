import TitleOrder from "@components/TitleOrder"
function Confirm() {
    const steps = ["Thông tin khách hàng", "Thông tin thanh toán", "Xác nhận đặt phòng"];
    const currentStep = 1; 
    return ( 
        <div>
            <TitleOrder  steps={steps} currentStep={currentStep}></TitleOrder>
        </div>
     );
}

export default Confirm;