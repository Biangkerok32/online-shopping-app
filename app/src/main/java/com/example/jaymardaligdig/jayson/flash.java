package com.example.jaymardaligdig.jayson;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Button;
import android.widget.Toast;

public class flash extends AppCompatActivity {
    WebView wb;
    Button button;
    public static boolean stas = false;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_flash);
        stas = true;
        button = findViewById(R.id.button2);
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
                moveTaskToBack(true);
            }
        });
        wb = findViewById(R.id.bro);
        WebSettings ws = wb.getSettings();
        ws.setJavaScriptEnabled(true);
        wb.setWebChromeClient(new WebChromeClient());
        wb.setWebViewClient(new WebViewClient(){
            @Override
            public void onReceivedError(WebView view, int errorCode, String description, String failingUrl){
                super.onReceivedError(view,errorCode,description,failingUrl);
                startActivity(new Intent(flash.this,errorcatch.class));
            }

            /*@Override
            public void onLoadResource(WebView view,String Url){
                super.onLoadResource(view,Url);

                startActivity(new Intent(flash.this,errorcatch.class));
            }*/
        });
        wb.loadUrl("https://evadable-transactio.000webhostapp.com/index2.php");
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        finish();
        moveTaskToBack(true);
    }
}
