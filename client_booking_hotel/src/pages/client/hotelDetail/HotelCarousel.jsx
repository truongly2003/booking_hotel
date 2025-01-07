// import { useState,useEffect } from "react";
import Carousel from "react-bootstrap/Carousel";
import image from "@assets/room_1.jpg";
function HotelCarousel() {
//   const [activeImage,setActiveImage]=useState(0)
//   const intervalTime = 2000; 
//   useEffect(()=>{
//     const interval=setInterval(()=>{
//       setActiveImage((prev)=>
//         prev===detailRoute.textImageList.length -1 ? 0 : prev +1
//       );
//     },intervalTime);
//     return ()=>clearInterval(interval)
//   },[detailRoute.textImageList.length])
//   const handleThumbnailClick=(index)=>{
//     setActiveImage(index)
//   }
  return (
    <div className="">
      <div className="position-relative">
        {/* activeIndex={activeImage} interval={intervalTime} */}
        <Carousel >
          {/* {detailRoute.textImageList.map((item, index) => ( */}
            <Carousel.Item >
              <img
                className="d-block w-100 rounded"
                // src={require(`../../../assets/images/Tour/${item.textImage}`)}
                // alt={item.textImage}
                src={image}
                style={{ maxHeight: '300px', objectFit: 'cover',width:'700px',height:'700px'  }}
              />
            </Carousel.Item>
          {/* ))} */}
        </Carousel>
        <div className="d-flex mt-2"  style={{
            overflowX: "auto", 
            whiteSpace: "nowrap", 
          }}>
          {/* {detailRoute.textImageList.map((item,index) => ( */}
            <img
            //   onClick={()=>handleThumbnailClick(index)}
            //   key={index}
            //   src={require(`../../../assets/images/Tour/${item.textImage}`)}
            //   alt={item.textImage}
              className="img-thumbnail me-2"
              style={{ width: "80px", height: "60px", objectFit: "cover",cursor: "pointer"  }}
              src={image}
            />
          {/* ))} */}
          
        </div>
      </div>
    </div>
  );
}

export default HotelCarousel;
