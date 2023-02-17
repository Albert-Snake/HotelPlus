package com.example.myapplication;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Toast;

public class LobbyActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lobby);
    }

    public void onClickMenu(View view) {
        //Toast.makeText(getApplicationContext(),"O botão do Menu Funciona",Toast.LENGTH_SHORT).show();
        Intent myIntent = new Intent(LobbyActivity.this, MenuActivity.class);
        LobbyActivity.this.startActivity(myIntent);
    }
}