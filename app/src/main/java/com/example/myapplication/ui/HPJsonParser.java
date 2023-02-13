package com.example.myapplication.ui;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;

import org.json.JSONException;
import org.json.JSONObject;

public class HPJsonParser {
    public static Boolean parserJsonLogin(String resposta) {
        try {
            JSONObject jsonLogin = new JSONObject(resposta);
                int id = jsonLogin.getInt("id");
                String username = jsonLogin.getString("username");
                if (id > 0){
                    //adicionar sharedpreferences
                    return true;
                }
        } catch (JSONException e) {
            e.printStackTrace();
        }

        return false;
    }

    public static Boolean isConnectionInternet(Context context) {

        ConnectivityManager cm =
                (ConnectivityManager) context.
                        getSystemService(Context.CONNECTIVITY_SERVICE);

        NetworkInfo networkInfo = cm.getActiveNetworkInfo();

        return networkInfo != null && networkInfo.isConnected();
    }

}
