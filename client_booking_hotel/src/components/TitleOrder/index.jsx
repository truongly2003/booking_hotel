import React from "react";
import PropTypes from "prop-types";

function TitleOrder({ steps, currentStep }) {
  return (
    <div className="container my-4">
      <div className="d-flex justify-content-between align-items-center">
        {steps.map((step, index) => (
          <React.Fragment key={index}>
            {/* Step Item */}
            <div className="d-flex align-items-center">
              <div
                className={`rounded-circle d-flex align-items-center justify-content-center ${
                  index + 1 === currentStep ? "bg-warning text-white" : "bg-secondary text-white"
                }`}
                style={{ width: "30px", height: "30px" }}
              >
                {index + 1}
              </div>
              <div
                className={`ms-2 ${
                  index + 1 === currentStep ? "text-dark" : "text-muted"
                }`}
              >
                {step}
              </div>
            </div>
            {/* Step Line */}
            {index < steps.length - 1 && (
              <div
                className={`flex-grow-1 mx-2 border-top ${
                  index +1 < currentStep ? "border-warning" : "border-secondary"
                }`}
                style={{ height: "2px" }}
              ></div>
            )}
          </React.Fragment>
        ))}
      </div>
    </div>
  );
}

TitleOrder.propTypes = {
  steps: PropTypes.arrayOf(PropTypes.string).isRequired, 
  currentStep: PropTypes.number.isRequired, 
};

export default TitleOrder;
