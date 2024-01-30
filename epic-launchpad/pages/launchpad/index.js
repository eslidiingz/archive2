import Image from "next/image";
import TabList from "../../components/utilities/tabs/tab-list";
import LaunchpadBuyPanel from "./buy-panel";
import LaunchpadSellPanel from "./sell-panel";

const LaunchpadPage = () => {
  return (
    <main className="d-flex flex-column min-vh-100">
      <div className="row pl-4 pr-2 mx-3 h-100 d-flex align-items-center ">
        <div className="epic-launhpad mx-auto">
          <div className="row">
            <div className="col-12 col-lg-6 p-4 pb-5 mb-3 mb-lg-0 order-2 order-lg-1 z-index-10">
              <div className="font-w-500 content-paper d-flex flex-column justify-content-center">
                <img
                  className="mx-auto"
                  src="Epic-token.png"
                  alt="Epic-token.png"
                  width={130}
                />

                <div className="mt-5">
                  <h3 className="text-h3 color-black">
                    $EPIC Token Private Sale Round:
                  </h3>
                  <ol className="text-desc">
                    <li>
                      Only for friends, family, founders, early members,
                      partners, advisors and early NFT adopters.
                    </li>
                    <li>1 EPIC = 0.5 BUSD</li>
                    <li>
                      1 Year vesting period. During vesting period, owners of
                      $EPIC token purchased during the private sale round CAN
                      NOT sell or trade their EPIC token.
                    </li>
                    <li>
                      25% of your EPIC token will be released at the end of
                      vesting period.
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 13
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 14
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 15
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 16
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 17
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 18
                    </li>
                    <li>
                      10% of your EPIC token will be released at the end of
                      month 19
                    </li>
                    <li>
                      5% of your EPIC token will be released at the end of month
                      20
                    </li>
                  </ol>
                </div>
              </div>
            </div>
            <div className="col-12 col-lg-6 p-0 mb-3 mb-lg-0 order-1 order-lg-2">
              <div className="bg-right">
                <div className="bg-tab">
                  <TabList>
                    <div label="Buy" className="tab-content pd-r-50">
                      <LaunchpadBuyPanel />
                    </div>
                    <div label="Sell" className="tab-content">
                      <LaunchpadSellPanel />
                    </div>
                  </TabList>
                </div>
              </div>

              {/* <div className="bg-right">
                <div className="bg-tab">
                  <TabList>
                    <div label="Buy" className="tab-content pd-r-50">
                      <LaunchpadBuyPanel />
                    </div>
                    <div label="Sell" className="tab-content">
                      <LaunchpadSellPanel />
                    </div>
                  </TabList> 
                </div>
              </div> */}
            </div>
          </div>
        </div>
      </div>
      {/* Modal  */}
      <div
        className="modal fade"
        id="exampleModal"
        tabIndex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div className="modal-dialog modal-dialog-centered">
          <div className="modal-content">
            <div className="modal-header">
              <h5 className="modal-title" id="exampleModalLabel">
                Modal title
              </h5>
              <button
                type="button"
                className="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div className="modal-body">...</div>
            <div className="modal-footer">
              <button
                type="button"
                className="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button type="button" className="btn btn-primary">
                Save changes
              </button>
            </div>
          </div>
        </div>
      </div>
    </main>
  );
};
export default LaunchpadPage;
