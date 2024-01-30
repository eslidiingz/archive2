/** @format */

export const acceptPolicy = async (acceptPoliy) => {
  try {
    const response = await fetch(
      `${process.env.REST_API}/profile/accept-policy`,
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-API-KEY": process.env.REST_API_KEY,
          authorization: `Bearer ${acceptPoliy.access_token}`,
        },
        body: JSON.stringify(acceptPoliy),
      }
    );

    const responseData = await response.json();

    return { status: responseData?.statusCode === 201 ? true : false };
  } catch {
    return { status: false };
  }
};
