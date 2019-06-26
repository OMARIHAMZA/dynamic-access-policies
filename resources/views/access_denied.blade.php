<style>
    #parent, #parent * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    #parent {
        padding: 0;
        margin: 0;
    }

    #error-403 {
        position: relative;
        height: 100vh;
    }

    #error-403 .error-403 {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .error-403 {
        max-width: 920px;
        width: 100%;
        line-height: 1.4;
        text-align: center;
        padding-left: 15px;
        padding-right: 15px;
    }

    .error-403 .error-403 {
        position: absolute;
        height: 100px;
        top: 0;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        z-index: -1;
    }

    .error-403 .error-403 h1 {
        font-family: 'Arial Rounded MT Bold', sans-serif;
        color: #aabbcc;
        font-weight: 900;
        font-size: 276px;
        margin: 0px;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .error-403 h2 {
        font-family: 'Arial Rounded MT Bold', sans-serif;
        font-size: 46px;
        color: #000;
        font-weight: 900;
        text-transform: uppercase;
        margin: 0px;
    }

    .error-403 h4 {
        font-family: 'Arial Rounded MT Bold', sans-serif;
        font-size: 32px;
        color: #000;
        font-weight: 600;
        /*text-transform: uppercase;*/
        margin: 0px;
    }

    .error-403 p {
        font-family: 'Arial Rounded MT Bold', sans-serif;
        font-size: 16px;
        color: #000;
        font-weight: 400;
        text-transform: uppercase;
        margin-top: 15px;
    }

    .error-403 a {
        font-family: 'Arial Rounded MT Bold', sans-serif;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
        background: #189cf0;
        display: inline-block;
        padding: 16px 38px;
        border: 2px solid transparent;
        border-radius: 40px;
        color: #fff;
        font-weight: 400;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .error-403 a:hover {
        background-color: #fff;
        border-color: #189cf0;
        color: #189cf0;
    }

    @media only screen and (max-width: 480px) {
        .error-403 .notfound-404 h1 {
            font-size: 162px;
        }

        .error-403 h2 {
            font-size: 26px;
        }
    }
</style>
<div id="parent">
    <div id="error-403">
        <div class="error-403">
            <div class="error-403">
                <h1>403</h1>
            </div>
            <h2>We are sorry, ACCESS DENIED!</h2>
            <h4>You don't have sufficient privileges to access this data.</h4>
            @if ($emergency_access)
                <p>It seems like you can access this data in emergency access cases.</p>
            @endif
            <div>
                <button class="btn btn-round btn-sm btn-success"
                        onclick="window.history.back()"
                >Back
                </button>
                <button class="btn btn-round btn-sm btn-primary"
                        onclick="localStorage.setItem('toggle', 'true');window.location.reload();"
                >Emergency Access
                </button>
            </div>

        </div>
    </div>

</div>