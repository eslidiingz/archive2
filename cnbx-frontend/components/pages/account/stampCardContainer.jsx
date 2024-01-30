import { useEffect } from "react";
import StampCardItem from "./stampCard";

const StampCardContainer = ({ cards }) => {
  return (
    <section>
      <div className="row">
        <div className="col-12">
          <h4 className="txt-showing">แสดง {cards.length} แสตมป์</h4>
          <div className="row">
            {cards.map((card) => (
              <StampCardItem data={card} key={cards.id} />
            ))}
          </div>
        </div>
      </div>
    </section>
  );
};

export default StampCardContainer;
