export default async function handler(req, res) {
    if (req.method !== "POST") {
        res.status(500).json({
          response: "Not Allow Method",
          data: null,
        });
    }
    try {
        const bodyData  = req.body;
        console.log(bodyData)
        const response = await fetch(
            `${process.env.REST_API}/account/verify-forgot-password`,
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-API-KEY": process.env.REST_API_KEY
                },
                body: JSON.stringify(bodyData)
            }
        );
        const responseData = await response.json();
        console.log(responseData);
        if(responseData.statusCode === 201) {
            res.status(201).json({status: true, data: responseData});
        } else {
            res.status(500).json({status: false, data: null});
        }
    } catch {
        res.status(500).json({status: false, data: null});
    }
}