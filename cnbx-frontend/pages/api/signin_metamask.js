export default async function handler(req, res) {
  if (req.method !== "POST") {
    res.status(500).json({
      response: "Not Allow Method",
      data: null,
    });
  }

  try {
    const { address, signature } = req.body;

    const response = await fetch(
      `${process.env.NEXT_PUBLIC_JNFT_API_URL}/account/sign`,
      {
        method: "POST",
        headers: {
          "X-API-KEY": `${process.env.NEXT_PUBLIC_JNFT_API_KEY}`,
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ address, signature }),
      }
    );

    const data = await response.json();

    const loginResponse = await fetch(
      `${process.env.NEXT_PUBLIC_JNFT_API_URL}/account/login`,
      {
        method: "POST",
        headers: {
          "X-API-KEY": `${process.env.NEXT_PUBLIC_JNFT_API_KEY}`,
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          username: data?.response?.data?.username,
          password: data?.response?.data?.username,
        }),
      }
    );

    const loginResponseJson = await loginResponse.json();

    res.status(200).json({
      response: "Login With Metamask success",
      data: loginResponseJson?.response?.data,
    });
  } catch (error) {
    // console.log(error);
    res.status(500).json({
      response: error,
      data: null,
    });
  }
}
