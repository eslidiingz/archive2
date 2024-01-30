/** @format */

export const login = async (credential) => {
  try {
    const response = await fetch(`${process.env.REST_API}/account/login`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": process.env.REST_API_KEY,
      },
      body: JSON.stringify(credential),
    });

    const responseData = await response.json();

    return {
      status: responseData?.statusCode === 201 ? true : false,
      data: {
        accessToken: responseData?.response?.data?.access_token || null,
      },
    };
  } catch {
    return { status: false, data: { accessToken: null } };
  }
};

export const register = async (registerInfo) => {
  try {
    const response = await fetch(`${process.env.REST_API}/account/register`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": process.env.REST_API_KEY,
      },
      body: JSON.stringify(registerInfo),
    });

    const responseData = await response.json();

    const otpRef = responseData?.response?.data?.otp_ref;

    return {
      status: true,
      data: {
        otpRef,
      },
    };
  } catch {
    return {
      status: false,
      data: {
        otpRef: null,
      },
    };
  }
};

export const verifyOtp = async (otpInfo) => {
  try {
    const response = await fetch(`${process.env.REST_API}/account/verify`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": process.env.REST_API_KEY,
      },
      body: JSON.stringify(otpInfo),
    });

    const responseData = await response.json();

    return { status: responseData?.statusCode === 201 ? true : false };
  } catch {
    return { status: false };
  }
};
