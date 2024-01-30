import { useEffect, useState, useRef } from "react"

const Stage = (props) => {
    const [datasSeats, setDatasSeats] = useState([]);
    const mouth = useRef(false);
    useEffect(() => {
        if (!mouth.current) {
            init();
            mouth.current = true;
        }
    }, []);

    const init = () => {
        setDatasSeats(props?.datasSeats || [])
    }

    return (
        <>
            <div className="row">
                <div className="h1 text-center col-12">Stage</div>
            </div>
            <div className="row">
                <div className="col-12">
                    {Array.isArray(datasSeats) && (datasSeats.map((data, index) => (
                        <div
                            key={index}
                            className="m-1 px-1 py-2 rounded d-inline-block"
                            style={{
                                backgroundColor: "GREEN",
                                color: "#FFFFFF",
                                cursor: "pointer"
                            }}>
                            {data?.name || "-"}
                        </div>
                    )))}
                </div>
            </div>
        </>
    )
}

export default Stage