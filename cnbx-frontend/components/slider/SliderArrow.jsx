import React, { Component } from "react";
import Slider from "react-slick";

const SliderArrow = (props) => {
    const directions = ['next', 'prev']
    const { direction, onClick } = props;
    return (
        <button
            type="button"
            data-role="none"
            className={`arrow-${directions?.includes(direction) ? direction : "next"}-customs`}
            onClick={onClick} >
        </button>
    );
}
export default SliderArrow