package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import java.util.Map;

import listeners.LoginListener;

public class LoginActivity extends AppCompatActivity implements LoginListener {

    private static final String EMAIL = "email";
    private static final String USER_NAME = "username";
    private static final String ID_USER = "id";
    private EditText txtusername, txtpass;
    private Button btiniciar, btregistar;
    private String username;
    private String id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        txtusername = findViewById(R.id.tbxUsername);
        txtpass = findViewById(R.id.tbxPassword);

        SharedPreferences sharedPreferences = getSharedPreferences("infouser", Context.MODE_PRIVATE);
        //quando inicia a aplicaçao a primeira vez ele nao regista como null ia dar erro s1= valor padrao
        if(!sharedPreferences.getString(ID_USER,"null").equals("null"))
        {// guarda login
            Intent IntentMain = new Intent(this, MenuActivity.class);
            IntentMain.putExtra(EMAIL, sharedPreferences.getString(EMAIL,""));
            IntentMain.putExtra(USER_NAME, sharedPreferences.getString(USER_NAME,""));
            IntentMain.putExtra(ID_USER, sharedPreferences.getString(ID_USER,""));
            startActivity(IntentMain);
            finish();
        }

        SingletonGestorHP.getInstancia(this).setLoginListener(this);
    }

    public void onClickLogin(View view) {
        efetuarLogin(view);
    }

    @Override
    public void onLogin(Map<String, String> dadosLogin) {
        if (dadosLogin.get("email") != null) {
            // System.out.println(username);
            Intent IntentMain = new Intent(this, MenuActivity.class);
            IntentMain.putExtra(EMAIL, dadosLogin.get("email"));
            IntentMain.putExtra(USER_NAME, username);
            IntentMain.putExtra(ID_USER, dadosLogin.get("id"));
            startActivity(IntentMain);
            finish();
        } else {
            Toast.makeText(this, R.string.valor_invalido, Toast.LENGTH_SHORT).show();
        }

    }

    private void efetuarLogin(View v) {
        String user = txtusername.getText().toString();
        String pass = txtpass.getText().toString();

        username = user;
        SingletonGestorHP.getInstancia(this).loginAPI(user, pass, this);

    }

    @Override
    public void onValidateLogin(Boolean rsp, Context context) {
        if (rsp == true){
            Intent IntentMain = new Intent(this, MenuActivity.class);
            startActivity(IntentMain);
        }
        else{
            Toast.makeText(context, "Utilizador ou Senha Inválidos", Toast.LENGTH_SHORT).show();
        }
    }
}