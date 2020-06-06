pkg load control
arg_list = argv();

A = [-0.313 56.7 0; -0.0139 -0.426 0; 0 56.7 0];
B = [0.232; 0.0203; 0];
C = [0 0 1];
D = [0];

p = 2;
K = lqr(A,B,p*C'*C,1);
N = -inv(C(1,:)*inv(A-B*K)*B);

sys = ss(A-B*K, B*N, C, D);

t = 0:0.1:40;
r =str2double(arg_list{1});
initAlfa=0;
initQ=0;
initTheta=str2double(arg_list{2});
[y,t,x]=lsim(sys,r*ones(size(t)),t,[initAlfa;initQ;initTheta]);

naklonLietadla = x(:,3);
naklonKlapky = r*ones(size(t)) * N-x * K';

printf("t=%.10f \n",t);
printf("l=%.10f \n",naklonLietadla);
printf("k=%.10f \n",naklonKlapky);

