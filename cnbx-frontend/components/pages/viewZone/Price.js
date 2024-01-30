import { useEffect, useRef, useState } from "react"

const Price = (props) => {
    const mouth = useRef(false);
    const [datasPrice, setDatasPrice] = useState([]);
    useEffect(() => {
        if (!mouth.current) {
            init();
            mouth.current = true;
        }
    }, []);

    const init = () => {
        setDatasPrice(props?.datasPrice || []);
    }

    return (
        <>
            <div className="row">
                <div className="h1 col-12">ราคา</div>
            </div>
            {Array.isArray(datasPrice) && (datasPrice.map((data, index) => (
                <div className="row" key={index}>
                    <div className="col-6">
                        {data?.name || "-"}
                    </div>
                    <div className="col-6">
                        {data?.price || "-"}
                    </div>
                </div>
            )))}
        </>
    );
}

export default Price