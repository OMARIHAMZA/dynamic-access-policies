<style>
    #root * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    #root {
        padding: 0;
        margin: 0;
        width: 100%;
        height: 100%;

    }

    #root .container {
        width: 100%;
        height: 100%;
        padding: 28px 48px;
        position: relative;
    }

    #root .container .background {
        max-width: 920px;
        width: 100%;
        line-height: 1.4;
        text-align: center;
        padding-left: 15px;
        padding-right: 15px;
    }

    #root .container .background .error-403 {
        position: absolute;
        height: 200px;
        top: 0;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        transform: translateX(-50%);
        z-index: 1;
    }

    #root .container .background .error-403 h1 {
        font-family: 'Century Gothic', sans-serif;
        color: #aabbcc;
        font-weight: 900;
        font-size: 276px;
        margin: 0;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    #root .container .foreground {
        max-width: 920px;
        width: 100%;
        line-height: 1.4;
        text-align: center !important;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 128px;
        margin: 0 auto !important;
        z-index: 12;
    }

    #root .container .foreground > div {

    }

    #root .container .foreground h2 {
        font-family: 'Century Gothic', sans-serif;
        font-size: 46px;
        color: #000;
        font-weight: 900;
        text-transform: uppercase;
        margin: 0;
        z-index: 3;
    }

    #root .container .foreground h4 {
        font-family: 'Century Gothic', sans-serif;
        font-size: 32px;
        color: #000;
        font-weight: 600;
        /*text-transform: uppercase;*/
        margin: 0;
        z-index: 3;
    }

    #root .container .foreground p {
        font-family: 'Century Gothic', sans-serif;
        font-size: 16px;
        color: #000;
        font-weight: 400;
        text-transform: uppercase;
        margin-top: 15px;
        z-index: 3;
    }

    #root .container .foreground button {
        font-family: 'Century Gothic', sans-serif;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
        display: inline-block;
        padding: 16px 38px;
        font-weight: 400;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    #root .container .foreground button.first {
        background: #dc3545;
        color: #fff;
    }

    #root .container .foreground button.first:hover {
        background-color: #fff;
        border-color: #dc3540;
        color: #dc3545;
    }

    #root .container .foreground button.second {
        background: #28a745;
        color: #fff;
    }

    #root .container .foreground button.second:hover {
        background-color: #fff;
        border-color: #28a740;
        color: #28a745;
    }

    #root .container .foreground .footer {
        margin-top: 48px;
        text-align: center;
        color: #fff;
        background-color: #ffc107;
        font-family: 'Century Gothic', sans-serif;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
    }

    .badge {
        border: 2px solid transparent;
        border-radius: 40px;
    }
</style>
<div id="root">
    <div class="container">
        <div class="background">
            <div class="error-403">
                <h1>403</h1>
            </div>
        </div>
        <div class="foreground">
            <div style="display: flex !important; flex-direction: column !important;">
                <h2>We are sorry, ACCESS DENIED!</h2>
                <h4>You don't have sufficient privileges to access this data.</h4>
                @if ($emergency_access)
                    <p>It seems like you can access this data in emergency access cases.</p>
                @endif
                <div>
                    <button class="badge second"
                            onclick="window.history.back()"
                    >Back
                    </button>
                    @if ($emergency_access)
                        <button class="badge first"
                                onclick="let req=new XMLHttpRequest();req.open('POST', 'localhost:5555/api/requests/{{$record_id}}/OK');req.send();localStorage.setItem('toggle', 'true');window.location.reload();
                                        ">Emergency Access
                        </button>
                    @endif
                </div>

                <hr/>

                <div class="badge footer">
                    Access to this site's data is controlled by <a href="http://localhost:5555">DMRAP</a> &copy;
                    2019
                </div>
            </div>
        </div>
    </div>
</div>
