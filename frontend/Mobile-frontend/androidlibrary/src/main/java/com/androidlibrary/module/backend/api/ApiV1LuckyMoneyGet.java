package com.androidlibrary.module.backend.api;

import android.content.Context;

import com.androidlibrary.module.ApiParams;
import com.androidlibrary.module.backend.ApiUrls;
import com.androidlibrary.module.backend.data.ProcessingData;
import com.androidlibrary.module.backend.request.AuthTokenGetRequest;

/**
 * Created by ameng on 7/11/16.
 */
public class ApiV1LuckyMoneyGet <T extends ProcessingData> extends AuthTokenGetRequest<T> {

    public ApiV1LuckyMoneyGet(Context context, ApiParams params) {
        super(context,params);
    }

    @Override
    protected String getUrl() {
        String lucky_code = "?lucky_token=" + getParams().luckyToken ;
        return ApiUrls.apiV1LuckyMoney(getParams())+lucky_code;
    }
}
