import Stage from "../../components/pages/viewSeat/Stage";
import SeatReserveDetail from "../../components/pages/viewSeat/SeatReserveDetail";
import { useRouter } from 'next/router';
import { useEffect, useRef } from "react";
const ViewSeat = () => {
    const router = useRouter();
    const mouth = useRef(false);
    useEffect(() => {
        if (!mouth.current && router?.query) {
            init();
            mouth.current = true;
        }
    }, [router?.query]);

    const init = () => {

    }

    return (
        <>
            <Stage />
            <SeatReserveDetail />
        </>
    )
}

export default ViewSeat;