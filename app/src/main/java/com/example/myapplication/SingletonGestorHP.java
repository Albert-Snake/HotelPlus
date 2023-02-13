package com.example.myapplication;

import android.content.Context;
import android.content.SharedPreferences;
import android.provider.SyncStateContract;
import android.util.Base64;
import android.widget.Toast;

import androidx.annotation.Nullable;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import listeners.LoginListener;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.JsonRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.myapplication.ui.HPJsonParser;


public class SingletonGestorHP {
    private final static String mUrlApiLogin = "http://10.0.2.2:8181/api/users/login";

    private static SingletonGestorHP instancia = null;

    private static RequestQueue volleyQueue = null;

    private LoginListener loginListener;

    public static synchronized SingletonGestorHP getInstancia(Context context) {
        if (instancia == null) {
            instancia = new SingletonGestorHP();
            volleyQueue = Volley.newRequestQueue(context);
        }
        return instancia;
    }


    public void loginAPI(final String mail, final String password, Context context){
        if (!HPJsonParser.isConnectionInternet(context)) {
            Toast.makeText(context, "Sem ligação á internet", Toast.LENGTH_SHORT).show();
            return;
        }
            StringRequest stringRequest = new StringRequest(Request.Method.GET, mUrlApiLogin, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    Boolean rsp = HPJsonParser.parserJsonLogin(response);
                    //ativar o listener
                    if (loginListener != null) {
                        loginListener.onValidateLogin(rsp, context);
                    }
                }
            },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Toast.makeText(context, "Login Inválido", Toast.LENGTH_SHORT).show();
                        }
                    }
            ) {
                @Override
                public Map<String, String> getHeaders() throws AuthFailureError {
                    Map<String, String> headers = new HashMap<>();

                    String credentials = mail + ":" + password;
                    String auth = "Basic " + Base64.encodeToString(credentials.getBytes(), Base64.NO_WRAP);
                    headers.put("Authorization", auth);
                    return headers;
                }
            };

            volleyQueue.add(stringRequest);

    }

    public void setLoginListener(LoginListener loginListener) {
        this.loginListener = loginListener;
    }



}
