/** @format */

export default async function handler(req, res) {
  if (req.method !== "POST") {
    res.status(500).json({
      response: "Not Allow Method",
      data: null,
    });
  }

  try {
    const { phone_number, citizen_number } = req.body;

    const response = await fetch(
      `${process.env.NEXT_PUBLIC_JNFT_API_URL}/account/verify-user`,
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-API-KEY": process.env.NEXT_PUBLIC_JNFT_API_KEY,
        },
        body: JSON.stringify({ phone_number, citizen_number }),
      }
    );

    const responseData = await response.json();
    console.log(responseData);

    res.status(responseData.statusCode).json({
      status: responseData?.response?.data?.status,
      data: {
        message: responseData?.response?.data?.message,
      },
    });
  } catch (error) {
    console.log(error);
    res.status(500).json({
      status: false,
      data: {
        message: null,
      },
    });
  }
}
