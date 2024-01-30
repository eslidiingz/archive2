export default async function handler(req, res) {
    if (req.method !== "POST") {
        res.status(500).json({
          response: "Not Allow Method",
          data: null,
        });
    }
    try {
        const acceptPolicy = req.body;
        const response = await fetch(
            `${process.env.REST_API}/profile/accept-policy`,
            {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                "X-API-KEY": process.env.REST_API_KEY,
                authorization: `Bearer ${acceptPolicy.access_token}`,
              },
              body: JSON.stringify(acceptPolicy),
            }
          );
        const responseData = await response.json();
        res.status(201).json({status: true});
        // return {
        //     status: responseData?.statusCode === 201 ? true : false
        // }
    } catch {
        res.status(500).json({status: false});
        // return {
        //     status: false
        // }
    }
}