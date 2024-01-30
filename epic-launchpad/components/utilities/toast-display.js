import Link from "next/link";

export const ToastDisplay = (props) => {
  const btnStyle =
    props.type === "process"
      ? "text-black font-16"
      : props.type === "success"
      ? "text-success font-16"
      : "text-danger font-16";

  return (
    <>
      <div className="d-flex align-items-center justify-content-between bg-message">
        <div className="d-flex align-items-start space-x-5">
          <div className="pt-2">
            <h4 className={btnStyle}>{props.title}</h4>
            <p className="text-black-50">{props.description}</p>
            {props.href && (
              <Link href={props.href}>
                <a
                  target="_blank"
                  className={`fw-bold fs-6 ${
                    props.type === "success" ? "text-success" : "text-black"
                  } `}
                >
                  View on EtherScan
                </a>
              </Link>
            )}
          </div>
        </div>
      </div>
    </>
  );
};