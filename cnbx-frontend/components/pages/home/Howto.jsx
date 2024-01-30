import Link from "next/link";
import SliderHowto from "../../slider/SliderHowto";
import { useRouter } from "next/router";
import { useTranslation, Trans } from "next-i18next";

function Howto() {
  const router = useRouter();
  const { t } = useTranslation("common");

  const Contenthowto = [
    {
      id: "1",
      title: t("Howto.Buy"),
      img: "/assets/image/howto/howtoImg01.webp",
      detail: t("Howto.BuyDetail"),
      href: "https://www.thailandpostmart.com/product/1013460000816/%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B8%94%E0%B8%88%E0%B8%AD%E0%B8%87%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-%E0%B8%84%E0%B8%A3%E0%B8%B4%E0%B8%9B%E0%B9%82%E0%B8%97%E0%B9%81%E0%B8%AA%E0%B8%95%E0%B8%A1%E0%B8%9B%E0%B9%8C-02-25651-00-%E0%B9%80%E0%B8%A3%E0%B8%B4%E0%B9%88%E0%B8%A1%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%AA%E0%B9%88%E0%B8%87-14-%E0%B8%AA%E0%B8%8465-%E0%B9%80%E0%B8%9B%E0%B9%87%E0%B8%99%E0%B8%95%E0%B9%89%E0%B8%99%E0%B9%84%E0%B8%9B/",
      textHref: t("Howto.BuyDetailClik"),
      detailTwo: "",
    },
    {
      id: "2",
      title: t("Howto.Register"),
      img: "/assets/image/howto/howtoImg02.webp",
      detail: t("Howto.RegisterDetail"),
      href: "/",
      textHref: "",
      detailTwo: "",
    },
    {
      id: "3",
      title: t("Howto.GetFree"),
      img: "/assets/image/howto/howtoImg03.webp",
      detail: t("Howto.GetFreeDetail"),
      href: "",
      textHref: " ",
      detailTwo: "",
    },
  ];

  return (
    <div>
      <section className="hilight-section_howto02" id="homepage">
        <div className="container">
          <div className="row">
            {/* web pc  */}
            <div className="col-12 text-center">
              <p className="text-topic_progress">
               {t("Howto.title1")}<br className="d-md-none d-block" />{t("Howto.title1_1")}
              </p>
              <div className="progressbar-wrapper d-lg-block d-none">
                <ul className="progressbar d-flex justify-content-center">
                  {Contenthowto.map((item, index) => (
                    <li key={index} className="mx-3">
                      <img className="img_progress" src={item.img} />
                      <h5 className="text-secondary">{item.title}</h5>
                      <p className="text-detail_howto">
                        {item.detail}
                        <Link href={item.href}>
                          <a target="_blank">
                            <span className="text-detail_howtoRed">
                              {item.textHref}
                            </span>
                          </a>
                        </Link>
                        {item.detailTwo}
                      </p>
                    </li>
                  ))}
                </ul>
              </div>
            </div>
            {/* web pc  */}
          </div>
          {/* mobile  */}
          <div className="mt-4 d-lg-none">
            {Contenthowto.map((item, index) => (
              <div key={index} className="step-mobile">
                <div className="step-colleft">
                  <div className="step-no">{item.id}</div>
                </div>
                <div className="step-mobile-content pb-4">
                  <h4>{item.title}</h4>
                  <img className="w-100 mb-2" src={item.img} />
                  <p className="text-detail_howto">
                    {item.detail}
                    <Link href={item.href}>
                      <a target="_blank">
                        <span className="text-detail_howtoRed">
                          {item.textHref}
                        </span>
                      </a>
                    </Link>
                    {item.detailTwo}
                  </p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>
    </div>
  );
}
export default Howto;
