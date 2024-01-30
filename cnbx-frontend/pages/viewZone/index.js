import MainLayoutDemo from "../../components/layouts/MainLayoutDemo";
import Zone from "../../components/pages/viewZone/Zone"
import Price from "../../components/pages/viewZone/Price"
import Stage from "../../components/pages/viewZone/Stage"
import Datas from "../data"

const ViewZone = () => {
    return (
        <>
            <div className="row">
                <div className="col-12">
                    <div className="row">
                        <div className="col-4">
                            <div class="card">
                                <div class="card-body col-12">
                                    <div className="col-12">
                                        <Price
                                            datasPrice={Datas?.zones || []}
                                        />
                                    </div>
                                    <div className="col-12">
                                        <Zone
                                            datasZones={Datas?.zones || []}
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-8">
                            <div class="card">
                                <div class="card-body col-12">
                                    <Stage
                                        datasSeats={Datas?.seats || []}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </>
    )

}


export default ViewZone;
ViewZone.layout = MainLayoutDemo