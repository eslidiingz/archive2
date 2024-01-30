/** @format */
export const verifyJWT = async () => {
  try {
    const response = await fetch(`${process.env.REST_API}/account/jwt`, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": process.env.REST_API_KEY,
        authorization: `Bearer ${
          JSON.parse(window.sessionStorage.getItem("authentication"))
            ?.access_token
        }`,
      },
    });

    const responseData = await response.json();

    return {
      status: responseData?.statusCode === 201 ? true : false,
      data: { user: responseData?.response?.data?.id },
    };
  } catch {
    return { status: false, data: { user: null } };
  }
};

export const userInfo = async () => {
  try {
    const response = await fetch(`${process.env.REST_API}/account/user-info`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": process.env.REST_API_KEY,
        authorization: `Bearer ${
          JSON.parse(window.sessionStorage.getItem("authentication"))
            ?.access_token
        }`,
      },
    });

    const responseData = await response.json();

    return { status: true, data: responseData?.response?.data };
  } catch {
    return { status: false, data: null };
  }
};

export const updateAccount = async (updateData) => {
  try {
    const response = await fetch(
      `${process.env.REST_API}/${process.env.REST_API_VERSION}/account/update-profile`,
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-API-KEY": process.env.REST_API_KEY,
          authorization: `Bearer ${
            JSON.parse(window.sessionStorage.getItem("authentication"))
              ?.access_token
          }`,
        },
        body: JSON.stringify(updateData),
      }
    );

    const responseData = await response.json();

    return { status: true, data: responseData?.response?.data };
  } catch {
    return { status: false, data: null };
  }
};
