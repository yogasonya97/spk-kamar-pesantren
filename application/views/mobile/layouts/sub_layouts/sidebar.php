<div class="sidebar dz-floting-sidebar">
        <div class="sidebar-header">
          <div class="app-logo">
            <img
              class="logo-dark"
              src="<?= base_url() ?>assets/mobile/assets/images/app-logo/logo.png"
              alt="logo" style="max-width: 60px !important;"
            />
            <img
              class="logo-white d-none"
              src="<?= base_url() ?>assets/mobile/assets/images/app-logo/logo.png"
              alt="logo" style="max-width: 60px !important;"
            />
          </div>
          <div class="title-bar mb-0">
            <h4 class="title font-w600">Main Menus</h4>
            <a href="javascript:void(0);" class="floating-close"
              ><i class="feather icon-x"></i
            ></a>
          </div>
        </div>
        <ul class="nav navbar-nav">
          <li>
            <a class="nav-link active" href="/">
              <span class="dz-icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M3 8.40002V21C3 21.2652 3.10536 21.5196 3.29289 21.7071C3.48043 21.8947 3.73478 22 4 22H20C20.2652 22 20.5196 21.8947 20.7071 21.7071C20.8946 21.5196 21 21.2652 21 21V8.40002C21.0001 8.23638 20.96 8.07523 20.8833 7.93069C20.8066 7.78616 20.6956 7.66265 20.56 7.57102L12.56 2.17102C12.3946 2.05924 12.1996 1.99951 12 1.99951C11.8004 1.99951 11.6054 2.05924 11.44 2.17102L3.44 7.57102C3.30443 7.66265 3.19342 7.78616 3.11671 7.93069C3.03999 8.07523 2.99992 8.23638 3 8.40002V8.40002ZM14 20H10V14H14V20ZM5 8.93202L12 4.20702L19 8.93202V20H16V13C16 12.7348 15.8946 12.4804 15.7071 12.2929C15.5196 12.1054 15.2652 12 15 12H9C8.73478 12 8.48043 12.1054 8.29289 12.2929C8.10536 12.4804 8 12.7348 8 13V20H5V8.93202Z"
                    fill="#BDBDBD"
                  />
                </svg>
              </span>
              <span>Home</span>
            </a>
          </li>
          <?php if ($this->session->userdata('role') == '1') :  ?>
          <li>
            <a class="nav-link" href="/admin/master/kamar">
            <span class="dz-icon">
                <svg
                  width="24"
                  height="24" 
                  viewBox="0 0 256 256"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <rect fill="none" height="256" width="256"/><line fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16" x1="24" x2="232" y1="224" y2="224"/><path d="M56,224V40a8,8,0,0,1,8-8H192a8,8,0,0,1,8,8V224" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"/><circle cx="156" cy="128" r="12"/></svg>
                <!-- <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M21.733 21.68C21.8274 21.5791 21.8999 21.4598 21.9458 21.3295C21.9918 21.1992 22.0102 21.0608 22 20.923L21 7.923C20.9806 7.67135 20.8667 7.43636 20.6813 7.26517C20.4958 7.09397 20.2524 6.99925 20 7H17C17 5.67392 16.4733 4.40215 15.5356 3.46447C14.5979 2.52678 13.3261 2 12 2C10.674 2 9.40219 2.52678 8.46451 3.46447C7.52682 4.40215 7.00004 5.67392 7.00004 7H4.00004C3.74764 6.99925 3.50429 7.09397 3.31882 7.26517C3.13335 7.43636 3.01947 7.67135 3.00004 7.923L2.00004 20.923C1.98941 21.0607 2.0074 21.199 2.05287 21.3294C2.09834 21.4597 2.17031 21.5793 2.26425 21.6804C2.35819 21.7816 2.47206 21.8622 2.5987 21.9172C2.72533 21.9722 2.86198 22.0004 3.00004 22H21C21.1377 22 21.2738 21.9715 21.3999 21.9165C21.5261 21.8614 21.6395 21.7809 21.733 21.68V21.68ZM12 4C12.7957 4 13.5588 4.31607 14.1214 4.87868C14.684 5.44129 15 6.20435 15 7H9.00004C9.00004 6.20435 9.31611 5.44129 9.87872 4.87868C10.4413 4.31607 11.2044 4 12 4V4ZM4.08004 20L4.92604 9H7.00004V11C7.00004 11.2652 7.1054 11.5196 7.29293 11.7071C7.48047 11.8946 7.73482 12 8.00004 12C8.26526 12 8.51961 11.8946 8.70715 11.7071C8.89468 11.5196 9.00004 11.2652 9.00004 11V9H15V11C15 11.2652 15.1054 11.5196 15.2929 11.7071C15.4805 11.8946 15.7348 12 16 12C16.2653 12 16.5196 11.8946 16.7071 11.7071C16.8947 11.5196 17 11.2652 17 11V9H19.074L19.92 20H4.08004Z"
                    fill="#BDBDBD"
                  /> -->
                </svg>
              </span>
              <span>Data Kamar</span>
            </a>
          </li>
          <li>
            <a class="nav-link" href="/admin/master/kriteria">
              <span class="dz-icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M18 1H6C5.20435 1 4.44129 1.31607 3.87868 1.87868C3.31607 2.44129 3 3.20435 3 4V22C3.00004 22.1978 3.05871 22.391 3.1686 22.5555C3.27848 22.7199 3.43465 22.848 3.61735 22.9237C3.80005 22.9993 4.00108 23.0192 4.19503 22.9806C4.38898 22.942 4.56715 22.8468 4.707 22.707L6.845 20.57L8.168 22.554C8.24932 22.678 8.35719 22.7823 8.48379 22.8594C8.61039 22.9365 8.75256 22.9846 8.9 23C9.04735 23.0156 9.19634 22.9979 9.33588 22.948C9.47542 22.8982 9.60193 22.8175 9.706 22.712L12 20.414L14.293 22.707C14.3977 22.8116 14.5242 22.8916 14.6635 22.9413C14.8029 22.9911 14.9515 23.0093 15.0987 22.9947C15.2459 22.98 15.388 22.9329 15.5149 22.8567C15.6417 22.7805 15.75 22.6771 15.832 22.554L17.155 20.57L19.293 22.707C19.4329 22.8468 19.611 22.942 19.805 22.9806C19.9989 23.0192 20.2 22.9993 20.3827 22.9237C20.5654 22.848 20.7215 22.7199 20.8314 22.5555C20.9413 22.391 21 22.1978 21 22V4C21 3.20435 20.6839 2.44129 20.1213 1.87868C19.5587 1.31607 18.7956 1 18 1V1ZM19 19.586L17.707 18.293C17.603 18.1874 17.4765 18.1066 17.337 18.0568C17.1974 18.0069 17.0484 17.9892 16.901 18.005C16.7539 18.0196 16.6119 18.0666 16.4851 18.1427C16.3584 18.2188 16.2501 18.322 16.168 18.445L14.845 20.43L12.707 18.293C12.5195 18.1055 12.2652 18.0002 12 18.0002C11.7348 18.0002 11.4805 18.1055 11.293 18.293L9.155 20.43L7.832 18.445C7.7499 18.322 7.64151 18.2187 7.51467 18.1425C7.38782 18.0664 7.24567 18.0194 7.09846 18.0049C6.95125 17.9903 6.80265 18.0086 6.66337 18.0585C6.52408 18.1083 6.39759 18.1884 6.293 18.293L5 19.586V4C5 3.73478 5.10536 3.48043 5.29289 3.29289C5.48043 3.10536 5.73478 3 6 3H18C18.2652 3 18.5196 3.10536 18.7071 3.29289C18.8946 3.48043 19 3.73478 19 4V19.586Z"
                    fill="#BDBDBD"
                  />
                  <path
                    d="M12 10H8C7.73478 10 7.48043 10.1054 7.29289 10.2929C7.10536 10.4804 7 10.7348 7 11C7 11.2652 7.10536 11.5196 7.29289 11.7071C7.48043 11.8946 7.73478 12 8 12H12C12.2652 12 12.5196 11.8946 12.7071 11.7071C12.8946 11.5196 13 11.2652 13 11C13 10.7348 12.8946 10.4804 12.7071 10.2929C12.5196 10.1054 12.2652 10 12 10Z"
                    fill="#BDBDBD"
                  />
                  <path
                    d="M12 14H8C7.73478 14 7.48043 14.1054 7.29289 14.2929C7.10536 14.4804 7 14.7348 7 15C7 15.2652 7.10536 15.5196 7.29289 15.7071C7.48043 15.8947 7.73478 16 8 16H12C12.2652 16 12.5196 15.8947 12.7071 15.7071C12.8946 15.5196 13 15.2652 13 15C13 14.7348 12.8946 14.4804 12.7071 14.2929C12.5196 14.1054 12.2652 14 12 14Z"
                    fill="#BDBDBD"
                  />
                  <path
                    d="M16 10H15C14.7348 10 14.4804 10.1054 14.2929 10.2929C14.1054 10.4804 14 10.7348 14 11C14 11.2652 14.1054 11.5196 14.2929 11.7071C14.4804 11.8946 14.7348 12 15 12H16C16.2652 12 16.5196 11.8946 16.7071 11.7071C16.8946 11.5196 17 11.2652 17 11C17 10.7348 16.8946 10.4804 16.7071 10.2929C16.5196 10.1054 16.2652 10 16 10Z"
                    fill="#BDBDBD"
                  />
                  <path
                    d="M16 14H15C14.7348 14 14.4804 14.1054 14.2929 14.2929C14.1054 14.4804 14 14.7348 14 15C14 15.2652 14.1054 15.5196 14.2929 15.7071C14.4804 15.8947 14.7348 16 15 16H16C16.2652 16 16.5196 15.8947 16.7071 15.7071C16.8946 15.5196 17 15.2652 17 15C17 14.7348 16.8946 14.4804 16.7071 14.2929C16.5196 14.1054 16.2652 14 16 14Z"
                    fill="#BDBDBD"
                  />
                  <path
                    d="M16 5H8C7.73478 5 7.48043 5.10536 7.29289 5.29289C7.10536 5.48043 7 5.73478 7 6C7 6.26521 7.10536 6.51957 7.29289 6.7071C7.48043 6.89464 7.73478 7 8 7H16C16.2652 7 16.5196 6.89464 16.7071 6.7071C16.8946 6.51957 17 6.26521 17 6C17 5.73478 16.8946 5.48043 16.7071 5.29289C16.5196 5.10536 16.2652 5 16 5Z"
                    fill="#BDBDBD"
                  />
                </svg>
              </span>
              <span>Data Kriteria</span>
            </a>
          </li>
          <?php endif; ?>
          <?php if ($this->session->userdata('role') == '2') :  ?>
            <li>
              <a class="nav-link" href="payment.html">
                <span class="dz-icon">
                  <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M18 1H6C5.20435 1 4.44129 1.31607 3.87868 1.87868C3.31607 2.44129 3 3.20435 3 4V22C3.00004 22.1978 3.05871 22.391 3.1686 22.5555C3.27848 22.7199 3.43465 22.848 3.61735 22.9237C3.80005 22.9993 4.00108 23.0192 4.19503 22.9806C4.38898 22.942 4.56715 22.8468 4.707 22.707L6.845 20.57L8.168 22.554C8.24932 22.678 8.35719 22.7823 8.48379 22.8594C8.61039 22.9365 8.75256 22.9846 8.9 23C9.04735 23.0156 9.19634 22.9979 9.33588 22.948C9.47542 22.8982 9.60193 22.8175 9.706 22.712L12 20.414L14.293 22.707C14.3977 22.8116 14.5242 22.8916 14.6635 22.9413C14.8029 22.9911 14.9515 23.0093 15.0987 22.9947C15.2459 22.98 15.388 22.9329 15.5149 22.8567C15.6417 22.7805 15.75 22.6771 15.832 22.554L17.155 20.57L19.293 22.707C19.4329 22.8468 19.611 22.942 19.805 22.9806C19.9989 23.0192 20.2 22.9993 20.3827 22.9237C20.5654 22.848 20.7215 22.7199 20.8314 22.5555C20.9413 22.391 21 22.1978 21 22V4C21 3.20435 20.6839 2.44129 20.1213 1.87868C19.5587 1.31607 18.7956 1 18 1V1ZM19 19.586L17.707 18.293C17.603 18.1874 17.4765 18.1066 17.337 18.0568C17.1974 18.0069 17.0484 17.9892 16.901 18.005C16.7539 18.0196 16.6119 18.0666 16.4851 18.1427C16.3584 18.2188 16.2501 18.322 16.168 18.445L14.845 20.43L12.707 18.293C12.5195 18.1055 12.2652 18.0002 12 18.0002C11.7348 18.0002 11.4805 18.1055 11.293 18.293L9.155 20.43L7.832 18.445C7.7499 18.322 7.64151 18.2187 7.51467 18.1425C7.38782 18.0664 7.24567 18.0194 7.09846 18.0049C6.95125 17.9903 6.80265 18.0086 6.66337 18.0585C6.52408 18.1083 6.39759 18.1884 6.293 18.293L5 19.586V4C5 3.73478 5.10536 3.48043 5.29289 3.29289C5.48043 3.10536 5.73478 3 6 3H18C18.2652 3 18.5196 3.10536 18.7071 3.29289C18.8946 3.48043 19 3.73478 19 4V19.586Z"
                      fill="#BDBDBD"
                    />
                    <path
                      d="M12 10H8C7.73478 10 7.48043 10.1054 7.29289 10.2929C7.10536 10.4804 7 10.7348 7 11C7 11.2652 7.10536 11.5196 7.29289 11.7071C7.48043 11.8946 7.73478 12 8 12H12C12.2652 12 12.5196 11.8946 12.7071 11.7071C12.8946 11.5196 13 11.2652 13 11C13 10.7348 12.8946 10.4804 12.7071 10.2929C12.5196 10.1054 12.2652 10 12 10Z"
                      fill="#BDBDBD"
                    />
                    <path
                      d="M12 14H8C7.73478 14 7.48043 14.1054 7.29289 14.2929C7.10536 14.4804 7 14.7348 7 15C7 15.2652 7.10536 15.5196 7.29289 15.7071C7.48043 15.8947 7.73478 16 8 16H12C12.2652 16 12.5196 15.8947 12.7071 15.7071C12.8946 15.5196 13 15.2652 13 15C13 14.7348 12.8946 14.4804 12.7071 14.2929C12.5196 14.1054 12.2652 14 12 14Z"
                      fill="#BDBDBD"
                    />
                    <path
                      d="M16 10H15C14.7348 10 14.4804 10.1054 14.2929 10.2929C14.1054 10.4804 14 10.7348 14 11C14 11.2652 14.1054 11.5196 14.2929 11.7071C14.4804 11.8946 14.7348 12 15 12H16C16.2652 12 16.5196 11.8946 16.7071 11.7071C16.8946 11.5196 17 11.2652 17 11C17 10.7348 16.8946 10.4804 16.7071 10.2929C16.5196 10.1054 16.2652 10 16 10Z"
                      fill="#BDBDBD"
                    />
                    <path
                      d="M16 14H15C14.7348 14 14.4804 14.1054 14.2929 14.2929C14.1054 14.4804 14 14.7348 14 15C14 15.2652 14.1054 15.5196 14.2929 15.7071C14.4804 15.8947 14.7348 16 15 16H16C16.2652 16 16.5196 15.8947 16.7071 15.7071C16.8946 15.5196 17 15.2652 17 15C17 14.7348 16.8946 14.4804 16.7071 14.2929C16.5196 14.1054 16.2652 14 16 14Z"
                      fill="#BDBDBD"
                    />
                    <path
                      d="M16 5H8C7.73478 5 7.48043 5.10536 7.29289 5.29289C7.10536 5.48043 7 5.73478 7 6C7 6.26521 7.10536 6.51957 7.29289 6.7071C7.48043 6.89464 7.73478 7 8 7H16C16.2652 7 16.5196 6.89464 16.7071 6.7071C16.8946 6.51957 17 6.26521 17 6C17 5.73478 16.8946 5.48043 16.7071 5.29289C16.5196 5.10536 16.2652 5 16 5Z"
                      fill="#BDBDBD"
                    />
                  </svg>
                </span>
                <span>Transactions</span>
              </a>
            </li>
            <li>
              <a class="nav-link" href="pages.html">
                <span class="dz-icon">
                  <i class="fi fi-rr-diamond"></i>
                </span>
                <span>Menu 1</span>
              </a>
            </li>
            <li>
              <a class="nav-link" href="components.html">
                <span class="dz-icon">
                  <i class="fi fi-rr-apps-add"></i>
                </span>
                <span>Menu 2</span>
              </a>
            </li>
          <?php endif; ?>
          <li>
            <a class="nav-link" href="/logout">
              <span class="dz-icon">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M16.65 3.10008C16.5318 3.04157 16.4033 3.00692 16.2717 2.9981C16.1401 2.98928 16.0081 3.00646 15.8831 3.04866C15.7582 3.09087 15.6428 3.15727 15.5435 3.24407C15.4442 3.33088 15.363 3.43639 15.3045 3.55458C15.246 3.67277 15.2114 3.80132 15.2025 3.9329C15.1937 4.06448 15.2109 4.19652 15.2531 4.32146C15.2953 4.4464 15.3617 4.5618 15.4485 4.66108C15.5353 4.76036 15.6408 4.84157 15.759 4.90008C17.4682 5.74788 18.8405 7.14857 19.6532 8.87467C20.4659 10.6008 20.6712 12.5509 20.2358 14.4084C19.8004 16.2659 18.7499 17.9217 17.2548 19.1069C15.7597 20.292 13.9079 20.937 12 20.937C10.0922 20.937 8.24035 20.292 6.74526 19.1069C5.25018 17.9217 4.19964 16.2659 3.76424 14.4084C3.32885 12.5509 3.53417 10.6008 4.34687 8.87467C5.15956 7.14857 6.5319 5.74788 8.24102 4.90008C8.47972 4.78192 8.6617 4.57379 8.74694 4.32146C8.83217 4.06913 8.81368 3.79327 8.69553 3.55458C8.57737 3.31588 8.36924 3.1339 8.11691 3.04866C7.86458 2.96343 7.58872 2.98192 7.35002 3.10008C5.23724 4.14875 3.54096 5.88079 2.5366 8.01498C1.53223 10.1492 1.27875 12.5602 1.81731 14.8566C2.35587 17.153 3.65485 19.2 5.50334 20.6651C7.35184 22.1302 9.64131 22.9275 12 22.9275C14.3587 22.9275 16.6482 22.1302 18.4967 20.6651C20.3452 19.2 21.6442 17.153 22.1827 14.8566C22.7213 12.5602 22.4678 10.1492 21.4635 8.01498C20.4591 5.88079 18.7628 4.14875 16.65 3.10008V3.10008Z"
                    fill="#FF8484"
                  />
                  <path
                    d="M12 13.0001C12.2652 13.0001 12.5196 12.8948 12.7071 12.7072C12.8947 12.5197 13 12.2654 13 12.0001V2.00012C13 1.73491 12.8947 1.48055 12.7071 1.29302C12.5196 1.10548 12.2652 1.00012 12 1.00012C11.7348 1.00012 11.4804 1.10548 11.2929 1.29302C11.1054 1.48055 11 1.73491 11 2.00012V12.0001C11 12.2654 11.1054 12.5197 11.2929 12.7072C11.4804 12.8948 11.7348 13.0001 12 13.0001Z"
                    fill="#FF8484"
                  />
                </svg>
              </span>
              <span>Logout</span>
            </a>
          </li>
        </ul>
        <div class="sidebar-bottom">
          <div class="dz-mode">
            <div class="theme-btn">
              <i class="feather icon-sun sun"></i>
              <i class="feather icon-moon moon"></i>
            </div>
          </div>
          <div class="app-info">
            <h6 class="name">Ombe Coffee Shop</h6>
            <span class="ver-info">App Version 1.0.0</span>
          </div>
        </div>
      </div>
