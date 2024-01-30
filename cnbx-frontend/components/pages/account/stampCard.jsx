import Link from "next/link";
import { useState, useCallback, useEffect } from "react";

const StampCardItem = ({ data }) => {
  const [detail, setDetail] = useState(null);
  const fetchItemDetail = useCallback(async () => {
    try {
      const result = await fetch(
        `${process.env.NEXT_PUBLIC_METADATA_URL}/${data.tokenHex}.json`
      );
      const response = await result.json();
      setDetail(response);
    } catch (error) {
      console.log(error);
    }
  }, []);

  useEffect(() => {
    fetchItemDetail();
  }, [fetchItemDetail]);

  if (!detail) return;

  return (
    <div className="col-xxl-3 col-xl-4 col-sm-6 col-12 my-2">
      <div className="box-card-nft">
        <Link href={`${process.env.NEXT_PUBLIC_JNFT_URL}/${data.tokenId}`}>
          <a className="cursor-pointer" target="_blank">
            <img src={detail?.image} className="w-100" />
          </a>
        </Link>
        <div className="row p-2">
          <div className="col-6">
            <h6>
              <span className="badge ci-bg-orange">#{detail?.edition}</span>
            </h6>
          </div>
          {/* <div className="col-6 text-end">
            <p className="txt-detail-gray-V2 fw-semibold">{detail?.title}</p>
          </div> */}
          <div className="col-12">
            <h5 className="txt-title-inventory">{detail?.name}</h5>
            <p className="txt-detail-inventory">{detail?.description}</p>
          </div>
        </div>
      </div>
    </div>
  );
};
export default StampCardItem;
