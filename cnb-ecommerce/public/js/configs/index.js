const app = "local";
const debug = true;

let Config = {
    CHAIN_ID: "",
    MBUSD_ADDR: "",
    CNB_ADDR: "",
    CNB_ECOMMERCE_ADDR: "",
    ADMIN_ROLE: "",
    RPC_URL: "",
};

const unlimitAmount = "0xffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff";

if (app === "local") {
    Config = {
        CHAIN_ID: 97,
        MBUSD_ADDR: "0x1E03067A3CCAB676a5FFaE386a7394Ca1f103bfb",
        CNB_ADDR: "0x6bDf66E7ce3b1eD70FD1AF000f2a2559F6Ceb477",
        CNB_ECOMMERCE_ADDR: "0xDba78f1b0F316605f2698670Fa17C3168b1E3D29",
        ADMIN_ROLE:
            "0xa49807205ce4d355092ef5a8a18f56e8913cf4a201fbe287825b095693c21775",
        RPC_URL: "https://nd-000-791-964.p2pify.com/9d72fc41e88bfa945e49d73b3645fe81",

    };
} else if (app === "staging") {
    Config = {
        CHAIN_ID: 97,
        MBUSD_ADDR: "0x1E03067A3CCAB676a5FFaE386a7394Ca1f103bfb",
        CNB_ADDR: "0x6bDf66E7ce3b1eD70FD1AF000f2a2559F6Ceb477",
        CNB_ECOMMERCE_ADDR: "0xDba78f1b0F316605f2698670Fa17C3168b1E3D29",
        ADMIN_ROLE:
            "0xa49807205ce4d355092ef5a8a18f56e8913cf4a201fbe287825b095693c21775",
        RPC_URL: "https://nd-000-791-964.p2pify.com/9d72fc41e88bfa945e49d73b3645fe81",

    };
} else if (app === "production") {
    Config = {
        CHAIN_ID: 97,
        MBUSD_ADDR: "0x1E03067A3CCAB676a5FFaE386a7394Ca1f103bfb",
        CNB_ADDR: "0x6bDf66E7ce3b1eD70FD1AF000f2a2559F6Ceb477",
        CNB_ECOMMERCE_ADDR: "0xDba78f1b0F316605f2698670Fa17C3168b1E3D29",
        ADMIN_ROLE:
            "0xa49807205ce4d355092ef5a8a18f56e8913cf4a201fbe287825b095693c21775",
        RPC_URL: "https://nd-000-791-964.p2pify.com/9d72fc41e88bfa945e49d73b3645fe81",

    };
}
